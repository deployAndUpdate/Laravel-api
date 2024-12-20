<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users List</title>
</head>
<body>
<h1>Users List</h1>

<!-- Кнопка для добавления нового пользователя -->
<a href="{{ route('users.create') }}" >
    <button style="background-color: green; color: white; padding: 10px; border: none;">
        Add User
    </button>
</a>

<!-- Список пользователей -->
<ul>
    @foreach ($users as $user)
        <li>
            {{ $user->name }} - {{ $user->email }}

            <!-- Кнопка для редактирования -->
            <form action="{{ route('users.edit', ['id' => $user->id]) }}" method="POST">
                @csrf
                @method('PUT') <!-- Указываем, что запрос будет PUT -->
                <button type="submit" style="background-color: blue; color: white; padding: 5px; border: none;">
                    Edit
                </button>
            </form>


            <!-- Форма для удаления -->
            <form action="{{ route('users.destroy') }}"  style="display: inline;">
                @csrf
                @method('DELETE')
                <input type="hidden" name="id" value="{{ $user->id }}">
                <button type="submit" style="background-color: red; color: white; padding: 5px; border: none;">
                    Delete
                </button>
            </form>
        </li>
    @endforeach
</ul>
</body>
</html>
