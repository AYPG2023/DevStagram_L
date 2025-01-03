<div>
    <!-- Simplicity is the ultimate sophistication. - Leonardo da Vinci -->
    @if ($posts->count() > 0)
    <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6 px-12">
            @foreach ($posts as $post)
                <div>
                    <a href="{{ route('posts.show', ['post' => $post, 'user' => $post->user]) }}"> <!--Esto funciona para cuando en la ruta quieres qie aparezca el nombre del
                usuario -->
                        <img src="{{ asset('uploads') . '/' . $post->imagen }}" alt="Imagen del Posts {{ $post->titulo }}" >
                    </a>
                </div>
            @endforeach
        </div>
        <div class="my-10">
            {{ $posts->links() }} <!--Faunciona para crear la paginacion en las publicaciones y tenga un diseño  se necesita agregar
                esta vista a tailwind.config.js para que pueda tener los diseños y se vea mejor-->
        </div>
    @else
        <p class="text-center">No hay posts, sigue a alguien para poder mostrar sus posts</p>
    @endif
</div>