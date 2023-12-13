<x-layout>
	<x-slot:title>
		{{ $title }}
	</x-slot>

<div>
@auth('web')
	@foreach ($users as $user)
		@if ($user->id == $user_id)
			<h3>Ваше имя: {{ $user->name }}</h3>
			<h4 style="margin-left: 5px;">Список ваших задач:</h4>
			@if (count($user->tasks) != null)
				<ul>
				@foreach ($user->tasks as $task)
					<a href="{{ route('delete', ['id' => $task->id]) }}">Удалить</a>
					<li>{{ $task->text }}</li>
				@endforeach
				</ul>
			@else
				<p>У вас отсутствуют задачи</p>
			@endif
			<br>
		@endif
	@endforeach
@endauth
</div>

</x-layout>
