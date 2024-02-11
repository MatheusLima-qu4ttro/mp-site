<x-app-layout>
    <x-slot name="header">
        <div class="card text-left">
            <div class="card-header bg-primary text-white">
                <h3>Categoria</h3>
            </div>
            <div class="card-body">
                <form method="post" action="{{route('category_create')}}">
                    <input type="hidden" name="categoryId" value="{{$category->id ?? null}}">
                    <div class="form-group">
                        <label for="categoryName">Nome</label>
                        <input value="{{$category->name ?? null}}" name="name" type="text" class="form-control" id="categoryName" placeholder="Nome da categoria" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary text-white m-1">Salvar</button>
                        <a href="{{route("category_list")}}" class="btn btn-secondary text-white m-1">Voltar</a>
                    </div>
                </form>
            </div>
        </div>
    </x-slot>
</x-app-layout>
