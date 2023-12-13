<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title }}</title>
</head>
<body>
	<header>
		<a href="/">Главная страница</a>
		<br>
		@guest('web')
			<a href="{{ route('register') }}">Регистрация</a>
		@endguest
		<br>
		@auth('web')
			<a href="{{ route('logout') }}">выйти</a>
		@endauth
		<br>
		@guest('web')
			<a href="{{ route('login') }}">Войти</a>
		@endguest
		<br>
		@auth('web')
			<a href="{{ route('addTask') }}">Создать задачу</a>
		@endauth
		<p>
			@auth('web')
				<a href="{{ route('show') }}">Список задач</a>
			@endauth
		</p>
	</header>
	{{ $slot }}
</body>
</html>
