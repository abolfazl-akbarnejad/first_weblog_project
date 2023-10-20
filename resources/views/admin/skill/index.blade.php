@extends('admin.layouts.master')
@section('title', 'skill')
@section('container')
    <div class="main-panel-profile">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title">
                    <span class="page-title-icon bg-gradient-primary text-white me-2">
                        <i class=" mdi mdi-star"></i>
                    </span> Skill
                </h3>
                <nav aria-label="breadcrumb">
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <span></span>Overview <i
                                class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="card">
                <div class="card-body">
                    <div style="width: 100%; display: flex; justify-content: space-between">
                        <h4 class="card-title">Skill List</h4>
                        <a href="{{ route('admin.skill.create') }}" class="btn btn-gradient-success btn-fw">Create</a>
                    </div>

                    <div class="card-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>%</th>
                                    <th>Status</th>
                                    <th>Setting</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($skills as $skill)
                                    <tr>
                                        <td>{{ $skill->id }}</td>

                                        <td>{{ $skill->name }}</td>
                                        <td style="width: 300px">
                                            <div class="w3-light-grey">
                                                <div class="w3-container w3-green w3-center"
                                                    style="width:{{ $skill->masteryPercentage }}%">
                                                    {{ $skill->masteryPercentage }}%</div>
                                            </div><br>
                                        </td>

                                        <td>
                                            @if ($skill->status == 1)
                                                <label class="badge badge-success"> Active</label>
                                            @else
                                                <label class="badge badge-warning">In Active</label>
                                            @endif
                                        </td>
                                        <td>

                                            <a href="{{ route('admin.skill.edit', $skill->id) }}"
                                                class="btn btn-gradient-primary btn-sm btn-fw">Edit</a>


                                            <form action="{{ route('admin.skill.destroy', $skill->id) }}" method="POST"
                                                style="display: inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="btn btn-gradient-danger btn-sm btn-fw ">delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
