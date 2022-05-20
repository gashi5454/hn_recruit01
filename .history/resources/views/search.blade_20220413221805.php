<x-app-layout>
    <div>
        <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
            <h1>検索結果</h1>
            @if(isset($offers))
            <table class="table">
            <tr>
                <th>ユーザー名</th><th>年齢</th><th>性別</th>
            </tr>
            @foreach($offers as $offer)
            <tr>
                <td>{{$offer->title}}</td><td>{{$offer->genre}}</td><td>{{$offer->appear_date}}</td>
            </tr>
            @endforeach
            </table>
            @endif
        </div>
    </div>
</x-app-layout>
