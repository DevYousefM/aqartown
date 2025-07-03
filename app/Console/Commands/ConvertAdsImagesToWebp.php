<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ConvertAdsImagesToWebp extends Command
{
    protected $signature = 'ads:convert-images-to-webp';

    protected $description = 'This Command will convert ads images to webp';

    public function handle()
    {
        try {


            $ads = DB::table('ads')
                ->whereNotNull('photo')
                ->whereRaw("LOWER(RIGHT(photo, 5)) != '.webp'")
                ->get();

            if ($ads->isEmpty()) {
                $this->info('✅ All ads use .webp format.');
                return;
            }

            $this->warn("⚠️ Ads with non-webp photos:");
            foreach ($ads as $ad) {
                $relativePath = "assets/images/ads/{$ad->photo}";
                $fullPath = public_path($relativePath);
                if (!file_exists($fullPath)) {
                    $this->error("File not found: {$relativePath}");
                    continue;
                }

                $webpPath = $this->convertToWebp($fullPath);

                if ($webpPath) {
                    $this->info("🟢 Converted to WebP: {$webpPath}");

                    DB::table('ads')
                        ->where('id', $ad->id)
                        ->update(['photo' => basename($webpPath)]);

                    unlink($fullPath);
                    $this->warn("🗑️ Deleted original file: {$fullPath}");
                } else {
                    $this->error("🔴 Failed to convert: {$fullPath}");
                }
            }

            $this->info("Total scanned: {$ads->count()}");
        } catch (\Exception $e) {
            $this->error($e->getMessage());
        }
    }
    protected function convertToWebp(string $sourcePath, int $quality = 80): ?string
    {
        if (!file_exists($sourcePath)) {
            return null;
        }
        $extension = strtolower(pathinfo($sourcePath, PATHINFO_EXTENSION));
        $filename = pathinfo($sourcePath, PATHINFO_FILENAME);
        $targetPath = dirname($sourcePath) . '/' . $filename . '.webp';

        switch ($extension) {
            case 'jpeg':
            case 'jpg':
                $image = imagecreatefromjpeg($sourcePath);
                break;
            case 'png':
                $image = imagecreatefrompng($sourcePath);
                imagepalettetotruecolor($image);
                imagealphablending($image, true);
                imagesavealpha($image, true);
                break;
            default:
                return null;
        }

        $success = imagewebp($image, $targetPath, $quality);
        imagedestroy($image);

        return $success ? $targetPath : null;
    }
}
