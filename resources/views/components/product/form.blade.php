@if ($role === "admin")
    <form action="{{ route("product.buy") }}">
        <input type="text" placeholder="admin">
    </form>
@else
    <form action="{{ route("product.update", ["product" => 1]) }}">
        <input type="text" placeholder="user">
    </form>
@endif