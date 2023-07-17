@extends('layouts.main')

@section('content')
    <div class="page-content">


        <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
            <div class="breadcrumb-title pe-3">@lang('site.products')</div>
            <div class="ps-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 p-0">
                        <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">إضافة كود</li>
                    </ol>
                </nav>
            </div>
            <div class="ms-auto">
                <div class="btn-group">
                    <a href="{{ route('company.index') }}" class="btn btn-outline-success px-5 radius-30">
                        <i class="bx bx-message-square-edit mr-1"></i>@lang('site.back') </a>
                </div>
            </div>
        </div>
        <!--end breadcrumb-->
        <div class="row row-cols-1 row-cols-2">


            <div class="col-md-9">

                <div class="card border-top border-0 border-4 border-primary">
                    <div class="card-body p-5">
                        <div class="card-title">
                            <div class="row">
                                <div class="col-md-4">
                                    <div><i class="bx bxs-user me-1 font-22 text-primary"></i></div>
                                    <h5 class="mb-0 text-primary">إضافة كود</h5>
                                </div>
                                <div class="col-md-8">
                                    <div class="category-data" style="text-align: left">
                                        <h6 id="category-status"> </h6>
                                        <h6 id="category-title" class="text-success"> </h6>
                                        <p id="category-includes"> </p>
                                        <p id="category-excludes"> </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <form class="row g-3" method="post" action="{{ route('createProduct') }}"
                            enctype="multipart/form-data">
                            @csrf



                            <div class="col-md-6">
                                <label for="gpc-input" class="form-label">الكود<span class="text-secondary"> </span></label>
                                <div class="input-group mb-3">
                                    <input type="text" required class="form-control" id="gpc-input" name="code"
                                        value="{{ old('code') }}" aria-describedby="gpc-button">

                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputFirstName" class="form-label">الإسم</label>
                                <input type="text" required class="form-control" id="inputFirstName" name="name"
                                    value="{{ old('name') }}">
                            </div>




                            <div class="col-12">
                                <button type="submit" id="submit"
                                    class="btn btn-primary px-5">@lang('site.save')</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <table style="border: 1px solid black;text-align: center">
                <tr style="border: 1px solid black">
                    <th style="border: 1px solid black">الإسم</th>
                    <th style="border: 1px solid black">الكود</th>
                </tr>
                @foreach ($allCodes as $code)
                <tr>
                    <td style="border: 1px solid black">{{ $code->name }}</td>
                    <td style="border: 1px solid black">{{ $code->code }}</td>
                </tr>
                @endforeach

            </table>
        </div>


    </div>
@endsection
