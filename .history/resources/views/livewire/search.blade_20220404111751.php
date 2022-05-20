<div>
    <div class="row mb-4">
        <div class="col form-inline">
            Per Page: &nbsp;
            <select wire:model="perPage" class="form-control">
                <option>10</option>
                <option>15</option>
                <option>25</option>
            </select>
        </div>

        <div class="col">
            <input wire:model="search" class="form-control" type="text" placeholder="キーワードを入力">
        </div>
    </div>

    <div class="row">
        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>
                    <a wire:click.prevent="sortBy('title')" role="button" href="#">
                        Title
                    </a>
                </th>
                <th>
                    <a wire:click.prevent="sortBy('eventers_id')" role="button" href="#">
                    Eventer
                    </a>
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach ($offers as $offer)
                <tr>
                    <td>{{ $offer->id }}</td>
                    <td>{{ $offer->title }}</td>
                    <td>{{ $offer->eventer['name'] }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <div class="row">
        <div class="col">
            {{ $offers->links() }}
        </div>

        <div class="col text-right text-muted">
            Showing {{ $offers->firstItem() }} to {{ $offers->lastItem() }} out of {{ $offers->total() }} results
        </div>
    </div>
</div>
