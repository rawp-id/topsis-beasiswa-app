@extends('layouts.app')
@section('content-dashboard')
    <div class="content-body">
        <div class="container pd-x-0">

            <h2>Ranking</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Nama</th>
                        @if (Auth::user()->is_admin)
                            <th>Detail</th>
                        @endif
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data_ranking as $item)
                        <tr class="@if ($loop->iteration <= 3) border border-2 border-dark @endif">
                            <td>{{ $loop->iteration }}</td>
                            <td class="@if ($loop->iteration <= 3) bg-success text-white @endif">
                                {{ $item['data']['nama'] }}
                                @if ($loop->iteration == 1)
                                    <i data-feather="award"></i>
                                @elseif ($loop->iteration == 2)
                                    <i data-feather="award"></i>
                                @elseif ($loop->iteration == 3)
                                    <i data-feather="award"></i>
                                @endif
                            </td>
                            @if (Auth::user()->is_admin)
                                <td>
                                    <a href="/beasiswa/{{ $item['data']['id'] }}" class="btn btn-sm btn-warning"
                                        wire:navigate><i data-feather="eye"></i></a>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
