@extends('HRPages/layoutHR')
@section('title', 'หน้าเกณฑ์การประเมิน')
@section('content')
    <h3 style="font-weight: 800">เกณฑ์การประเมิน</h3>


    {{-- <div>
        <a class="btn btn-primary" href="{{ route('criterion.create') }}">New criterion</a>
    </div> --}}

    <div>
        @if (session()->has('success'))
            <div>
                {{ session('success') }}
            </div>
        @endif
    </div>

    <div class="table table-responsive  " style="width: 100%">
        <table class="table-bordered border-white  table-bordered text-center" style="width: 100%">
            <tr class="head">
                {{-- <th>ลำดับ</th> --}}
                <th>หัวข้อการประเมิน</th>
                {{-- <th>max</th>
                <th>min</th> --}}
                <th>ช่วงการประเมิน(%)</th>
                <th>score</th>
                <th>levelOfQuality</th>
                <th>แก้ไข</th>
                <th>ลบ</th>
            </tr>
            @foreach ($criterions as $criterion)
                <tr class="column">
                    {{-- <td>{{ $employee->empID}}</td> --}}
                    <td>{{ $criterion->title }}</td>
                    {{-- <td>{{ $criterion->max}}</td>
                    <td>{{ $criterion->min}}</td> --}}
                    <td>{{ $criterion->max }} - {{ $criterion->min }}</td> <!-- เพิ่มช่วงเกณฑ์ -->
                    <td>{{ $criterion->score }}</td>
                    <td>{{ $criterion->levelOfQuality }}</td>



                    <td>
                        <a class="px-1 btn btn-success"
                            href="{{ route('editcriterionHR', ['criterion' => $criterion->idcriterion]) }}">แก้ไข</a>
                    </td>
                    <td>
                        <form method="POST"
                            action="{{ route('deletcriterionHR', ['criterion' => $criterion->idcriterion]) }}">
                            @csrf
                            @method('delete')
                            <input type="submit" value="ลบ" class="px-2.5  btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection