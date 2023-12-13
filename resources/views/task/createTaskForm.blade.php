<x-layout>
	<x-slot:title>
		{{ $title }}
	</x-slot>

@auth('web')
<h3>Новое задание</h3>
<form action="{{ route('addTaskAction') }}" method="POST">
	@csrf
	<label for="task">Введите текст задания:</label>
	<div>
		<textarea id="task" name="task" cols="60" rows="10"></textarea>
	</div>
	@error('task')
		<p style="color: red; font-weight: 600">{{ $message }}</p>
	@enderror
	<input type="submit">
</form>
@endauth

@guest('web')
	<p>Пожалуйста, войдите в систему</p>
@endguest

</x-layout>
