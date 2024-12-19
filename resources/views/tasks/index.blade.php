@extends('layouts.app')

@section('content')
<div class="container py-4">
    <h1 class="mb-4 text-center text-primary">Danh sách Task</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-success mb-3">+ Thêm mới</a>
    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th>ID</th>
                    <th>Tiêu đề</th>
                    <th>Mô tả</th>
                    <th>Trạng thái</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tasks as $task)
                    <tr class="align-middle">
                        <td class="text-center">{{ $task->id }}</td>
                        <td>{{ $task->title }}</td>
                        <td>{{ $task->description }}</td>
                        <td class="text-center">
                            <span class="badge {{ $task->completed ? 'bg-success' : 'bg-warning text-dark' }}">
                                {{ $task->completed ? 'Hoàn thành' : 'Chưa hoàn thành' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <a href="{{ route('tasks.show', $task->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('tasks.edit', $task->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                            <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
