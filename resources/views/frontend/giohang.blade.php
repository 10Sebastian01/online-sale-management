@extends('layouts.frontend')

@section('title', 'Sản phẩm')

@section('content')
    <div class="container pb-5 mb-2 mb-md-4">
        <div class="row">
            <section class="col-lg-8">
                <form action="{{ route('frontend.giohang.capnhat') }}" method="post">
                    @csrf
                    <div class="d-flex justify-content-between align-items-center pt-3 pb-4 pb-sm-5 mt-1">
                        <h2 class="h6 text-light mb-0">Sản phẩm trong giỏ</h2>
                        <a class="btn btn-outline-primary btn-sm ps-2" href="{{ route('frontend.sanpham') }}">
                            <i class="ci-arrow-left me-2"></i>Tiếp tục mua hàng
                        </a>
                    </div>
                    @foreach(Cart::content() as $value)
                        <div class="d-sm-flex justify-content-between align-items-center pb-3 border-bottom">
                            <div class="d-block d-sm-flex align-items-center text-center text-sm-start">
                                <a class="d-inline-block flex-shrink-0 mx-auto me-sm-4" href="#">
                                    <img src="{{ env('APP_URL') . '/storage/app/' . $value->options->image }}"
                                         width="160"/>
                                </a>
                                <div class="pt-2">
                                    <h3 class="product-title fs-base mb-2">{{ $value->name }}</h3>
                                    <div class="fs-lg text-accent pt-2">{{ number_format($value->price, 0, ',', '.') }}
                                        <small>đ</small></div>
                                </div>
                            </div>
                            <div class="pt-2 pt-sm-0 ps-sm-3 mx-auto mx-sm-0 text-center text-sm-start"
                                 style="max-width:12rem;">
                                <label class="form-label" for="quantity">Số lượng</label>
                                <div class="input-group">
                                 <span class="input-group-text">
                                 <a href="{{ route('frontend.giohang.giam', ['row_id' => $value->rowId]) }}"><i class="ci-arrow-left-circle"></i></a>
                                 </span>
                                    <input class="form-control text-center" type="text" id="qty"
                                           name="qty[{{ $value->rowId }}]" min="1" value="{{ $value->qty }}"/>
                                    <span class="input-group-text">
                                 <a href="{{ route('frontend.giohang.tang', ['row_id' => $value->rowId]) }}"><i class="ci-arrow-right-circle"></i></a>
                                 </span>
                                </div>
                                <a class="btn btn-link px-0 text-danger"
                                   href="{{ route('frontend.giohang.xoa', ['row_id' => $value->rowId]) }}">
                                    <i class="ci-close-circle me-2"></i><span class="fs-sm">Xóa</span>
                                </a>
                            </div>
                        </div>
                    @endforeach
                    <button class="btn btn-outline-accent d-block w-100 mt-4" type="submit">
                        <i class="ci-loading fs-base me-2"></i>Cập nhật giỏ hàng
                    </button>
                </form>

            </section>

            <aside class="col-lg-4 pt-4 pt-lg-0 ps-xl-5">
                <div class="bg-white rounded-3 shadow-lg p-4">
                    <div class="py-2 px-xl-2">
                        <div class="text-center mb-4 pb-3 border-bottom">
                            <h2 class="h6 mb-3 pb-1">Tổng tiền</h2>
                            <h3 class="fw-normal">{{ Cart::priceTotal() }}<small>đ</small></h3>
                        </div>
                        <div class="mb-4">
                            <label class="form-label mb-3" for="order-comments">
                                <span class="badge bg-info fs-xs me-2">Note</span>
                                <span class="fw-medium">Ghi chú bổ sung</span>
                            </label>
                            <textarea class="form-control" rows="9" id="order-comments"></textarea>
                        </div>
                        <a class="btn btn-primary btn-shadow d-block w-100 mt-4" href="{{ route('user.dathang') }}">
                            <i class="ci-card fs-lg me-2"></i>Thanh toán
                        </a>
                    </div>
                </div>
            </aside>
        </div>
    </div>
@endsection
