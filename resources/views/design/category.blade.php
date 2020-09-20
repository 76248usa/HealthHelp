@extends('admin.layouts.main')
@section('content')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 ml-4 text-gray-400">Category</h1>

    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Home</a></li>

        <li class="breadcrumb-item active" aria-current="page">Category</li>
    </ol>
</div>

<div class="col-lg-10">
    <form
        action="{{ route('category.store') }}"
        method="POST"
        enctype="multipart/form-data"
    >
        @csrf

        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
        >
            <h6 class="m-0 font-weight-bold text-primary">Create Category</h6>
        </div>
        <div class="card-body">
            <form>
                <div class="form-group">
                    <label for="">Name</label>
                    <input
                        type="text"
                        class="form-control"
                        id=""
                        placeholder="Enter name og category"
                    />
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <textarea
                        name="description"
                        class="form-control"
                    ></textarea>

                    <div class="form-group">
                        <div class="custom-file">
                            <label class="custom-file-label" for="customFile"
                                >Choose File</label
                            >
                            <input
                                type="file"
                                class="custom-file-input"
                                id="customFile"
                                name="image"
                            />
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </form>
</div>

@endsection
