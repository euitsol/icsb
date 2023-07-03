@extends('layouts.app', ['page' => __('FAQ'), 'pageSlug' => 'faq'])

@section('content')
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="card-header card-header-primary d-flex justify-content-between">
                <h4 class="card-title mt-0"> FAQS</h4>
                <a href="" class="btn btn-primary">Add FAQ</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="">
                            <th>
                                SN
                            </th>
                            <th>
                                Title
                            </th>
                            <th>
                                Description
                            </th>
                            <th>
                                Action
                            </th>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $key=>$faq)
                                <tr>
                                    <td>
                                        {{$key+1}}
                                    </td>
                                    <td>
                                        {{$faq->title}}
                                    </td>
                                    <td>
                                        {{$faq->description}}
                                    </td>
                                    <td>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
