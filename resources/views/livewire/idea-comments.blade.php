<div>
    @if ($comments->isNotEmpty())
        <div class="comments-container relative space-y-6 md:ml-22 pt-4 my-8 mt-1">

            @foreach ($comments as $comment) 
                <livewire:idea-comment
                    :key="$comment->id"
                    :comment="$comment"
                    :ideaUserId="$idea->user->id"
                />
            @endforeach

            {{-- <div class="comment-container relative bg-white rounded-xl flex mt-4">
                <div class="flex flex-col md:flex-row flex-1 px-4 py-3 md:py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="http://source.unsplash.com/200x200/?face&crop=face&v=2" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full mx-0 md:mx-4">
                        <div class="text-gray-600 line-clamp-3 mt-2 md:mt-0">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque suscipit, consequatur repudiandae provident, iusto minus corrupti sapiente odit architecto laborum ab laudantium enim, omnis molestias quam quod. Dicta facilis minima, incidunt corporis ratione cum voluptatum necessitatibus hic, pariatur excepturi, architecto et illum obcaecati reiciendis similique laboriosam deserunt qui inventore maxime.
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-gray-900">Mary Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div 
                                x-data="{ isOpen: false }"
                                class="flex items-center space-x-2">
                                <div class="relative">
                                    <button
                                        @click="isOpen = !isOpen" 
                                        class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3"
                                    >
                                        <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></path></svg>
                                    </button>
                                    <ul 
                                        x-cloak
                                        x-show.transition.origin.top.left="isOpen"
                                        @click.away="isOpen = false"
                                        @keydown.escape.window="isOpen = false"                                     
                                        class="absolute w-44 z-10 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8
                                        top-8 md:top-6 right-0 md:left-0"
                                    >
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                    </ul>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end comment-container --> --}}


            {{-- <div class="is-status-update comment-container relative bg-white rounded-xl flex mt-4">
                <div class="flex flex-col md:flex-row flex-1 px-4 py-3 md:py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="http://source.unsplash.com/200x200/?face&crop=face&v=3" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                        <div class="md:text-center uppercase text-blue text-xxs font-bold mt-1">Admin</div>
                    </div>
                    <div class="w-full mx-0 md:mx-4">
                        <h4 class="text-xl font-semibold mt-2 md:mt-0">
                            <a href="#" class="hover:underline">Status changed to "Under Consideration"</a>
                        </h4>
                        <div class="text-gray-600 mt-3 line-clamp-3">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam, officia delectus? Mollitia cum, commodi eaque ex iure accusamus possimus veritatis natus expedita nulla aliquid id quidem velit ab rem quam sint fugit ratione fugiat! Hic tenetur consequatur error! Sed fuga perspiciatis id deleniti placeat fugiat fugit cum aperiam deserunt maxime vel excepturi odio ipsa, eius minima iste sunt consequuntur illo?
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-blue">Andrea</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></path></svg>
                                    <ul class="hidden absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8
                                    top-8 md:top-6 right-0 md:left-0">
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end comment-container --> --}}


            {{-- <div class="comment-container relative bg-white rounded-xl flex mt-4">
                <div class="flex flex-col md:flex-row flex-1 px-4 py-3 md:py-6">
                    <div class="flex-none">
                        <a href="#">
                            <img src="http://source.unsplash.com/200x200/?face&crop=face&v=4" alt="avatar" class="w-14 h-14 rounded-xl">
                        </a>
                    </div>
                    <div class="w-full mx-0 md:mx-4">
                        <div class="text-gray-600 line-clamp-3 mt-2 md:mt-0">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Itaque suscipit, consequatur repudiandae provident, iusto minus corrupti sapiente odit architecto laborum ab laudantium enim, omnis molestias quam quod. Dicta facilis minima, incidunt corporis ratione cum voluptatum necessitatibus hic, pariatur excepturi, architecto et illum obcaecati reiciendis similique laboriosam deserunt qui inventore maxime.
                        </div>

                        <div class="flex items-center justify-between mt-6">
                            <div class="flex items-center text-xs text-gray-400 font-semibold space-x-2">
                                <div class="font-bold text-gray-900">Mark Doe</div>
                                <div>&bull;</div>
                                <div>10 hours ago</div>
                            </div>
                            <div class="flex items-center space-x-2">
                                <button class="relative bg-gray-100 hover:bg-gray-200 border rounded-full h-7 transition duration-150 ease-in py-2 px-3">
                                    <svg fill="currentColor" width="24" height="6"><path d="M2.97.061A2.969 2.969 0 000 3.031 2.968 2.968 0 002.97 6a2.97 2.97 0 100-5.94zm9.184 0a2.97 2.97 0 100 5.939 2.97 2.97 0 100-5.939zm8.877 0a2.97 2.97 0 10-.003 5.94A2.97 2.97 0 0021.03.06z" style="color: rgba(163, 163, 163, .5)"></path></svg>
                                    <ul class="hidden absolute w-44 text-left font-semibold bg-white shadow-dialog rounded-xl py-3 md:ml-8
                                    top-8 md:top-6 right-0 md:left-0">
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Mark as Spam</a></li>
                                        <li><a href="#" class="hover:bg-gray-100 block transition duration-150 ease-in px-5 py-3">Delete Post</a></li>
                                    </ul>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end comment-container --> --}}


        </div> <!-- end comments-container -->

        <div class="my-8 md:ml-22">
            {{ $comments->onEachSide(1)->links() }}
        </div>
    @else 
        <div class="mx-auto w-70 mt-12">
            <img src="{{ asset('/img/no-ideas.svg') }}" alt="No Ideas" class="mx-auto mix-blend-luminosity" /> 
            <div class="text-gray-400 text-center font-bold mt-6">
                No comments yet...
            </div>
        </div>
    @endif
</div>