                                @foreach ($conv->messages as $message)
                                    @if ($message->user_id != null)
                                        <div class="single-reply-area user">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="reply-area">
                                                        <div class="left">
                                                            <p>{{ $message->message }}</p>
                                                        </div>
                                                        <div class="right">
                                                            @if ($message->conversation->user->is_provider == 1)
                                                                <img class="img-circle"
                                                                    src="{{ $message->conversation->user->photo != null ? $message->conversation->user->photo : asset(access_public() . 'assets/images/noimage.png') }}"
                                                                    alt="">
                                                            @else
                                                                <img class="img-circle"
                                                                    src="{{ $message->conversation->user->photo != null ? asset(access_public() . 'assets/images/users/' . $message->conversation->user->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                                                    alt="">
                                                            @endif
                                                            <a target="_blank" class="d-block profile-btn"
                                                                href="{{ route('admin-user-show', $message->conversation->user->id) }}"
                                                                class="d-block">View Profile</a>
                                                            <p class="ticket-date">
                                                                {{ $message->created_at->diffForHumans() }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                    @else
                                        <div class="single-reply-area admin">
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="reply-area">
                                                        <div class="left">
                                                            <img class="img-circle"
                                                                src="{{ Auth::guard('admin')->user()->photo ? asset(access_public() . 'assets/images/admins/' . Auth::guard('admin')->user()->photo) : asset(access_public() . 'assets/images/noimage.png') }}"
                                                                alt="">
                                                            <p class="ticket-date">
                                                                {{ $message->created_at->diffForHumans() }}</p>
                                                        </div>
                                                        <div class="right">
                                                            <p>{{ $message->message }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                    @endif
                                @endforeach
