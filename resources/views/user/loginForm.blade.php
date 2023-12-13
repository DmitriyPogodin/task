<x-layout>
	<x-slot:title>
		{{ $title }}
	</x-slot>

<form action="{{ route('loginAction') }}" method="POST">
@csrf
<div>
	<label for="name">Введите имя:</label>
	<input id="name" type="text" name="name">
	@error('name')
		<p style="color: red; font-weight: 600">{{ $message }}</p>
	@enderror
</div>
<div>
	<label for="password">Введите пароль:</label>
	<input id="password" type="text" name="password">
	@error('password')
		<p style="color: red; font-weight: 600">{{ $message }}</p>
	@enderror
</div>
	<input type="submit">
</form>

</x-layout>
