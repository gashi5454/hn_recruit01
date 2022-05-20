<div>
    <form wire:submit.prevent="render" method="GET">
        <div>
            <input type="text" wire:model.defer="word">
            <button>
                検索
            </button>
        </div>

        <select wire:model.lazy="type">
            <option value="new">新着</option>
            <option value="old">投稿が古い順</option>
        </select>
    </form>

    <div>
        @foreach ($posts as $post)
        <p>{{$posts->title}}</p>
        @endforeach
        @if ($posts->count() === 0)
        検索キーワードに一致する検索結果がありません。
        @endif
    </div>
</div>
