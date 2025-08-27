 <div class="mt-3" >
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">

                    <div class="bg-white dark:bg-gray-800 over[flow-hidden shadow-sm sm:rounded-lg]">
                         <div class="p-6 text-gray-900 dark:text-gray-100">
                            <div class="text-justify between">
                                 <div>
                                     <span class="text-gray-500 me-3" >Autor</span>
                                     <span class="text blue 600">{{ $post->user->name }}</span>
                                 </div>
                                 <div>
                                     <span class="text-gray-500 me-3" >Criado em: </span>
                                     <span>{{ $post->created_at }}</span>
                                 </div>
                                 <div class="mt-3 ps-5" >
                                     <span class="text-xl font-bold" >{{ $post->title}} </span>
                                    <p class="mt 3">
                                         {{ $post->content }}
                                    </p>
                                 </div>

                                 <div class="mt-3 ps-5 text-end">
                                      @can('post.delete',$post)
                                         <div class="max-w-7xl mx-auto mb-6 px-8">
                                               <a href="#"  class="bg-red-400 hover:bg-red-600 text-white font-bold py-2 px-6 rounded">Delete post</a>
                                         </div>
                                        
                                      @endcan
                                 </div>
                            </div>
                    </div>
                </div>
            </div>
      </div>