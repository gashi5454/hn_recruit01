<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1>検索結果</h1>
            @if(isset($offers))
            <x-jet-section-border />
            <table class="table">
            <tr>
                <th>タイトル</th><th>ジャンル</th><th>出演日</th><th>出演条件</th>
            </tr>
            @foreach($offers as $offer)
            <tr>
                <td>{{$offer->title}}</td><td>{{$offer->genre}}</td><td>{{$offer->appear_date}}</td><td>{{$offer->}}</td>
            </tr>
            <x-jet-section-border />
            @endforeach
            </table>
            @endif
        </div>
    </div>
</x-app-layout>
