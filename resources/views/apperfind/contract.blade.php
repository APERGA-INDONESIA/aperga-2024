@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-left: 10px">
            <a style="text-decoration: none; color:unset" href="/apperfind/detail/1"><i class="fa fa-arrow-left"></i></a> &nbsp;
            Pengajuan Kontrak
        </h3>
        <div class="apperfind-detail">
            <div class="detail">
                <div class="main-photo">
                    <img src="{{ $data->image1 ?? "/img/logo-w.png"}}" alt="logo-w">
                </div>
                <span class="title">{{ $data->name }}</span>
                <span class="subtitle">{{ $data->type->type }}</span>
                <div class="highlight">
                    <div class="item">
                        <div class="info">{{ @$data->experience_year }}</div>
                        <div class="label">Tahun Pengalaman</div>
                    </div>
                    <div class="item">
                        <div class="info"><i class="fa-regular fa-star"></i> &nbsp;{{ number_format($data->rating, 1, '.', '.') }}</div>
                        <div class="label">Rating</div>
                    </div>
                </div>
                <div class="divider"></div>
                
                <div class="bio">
                    <div class="heading">
                        <div id="biocat-biodata" class="item cat active" onclick="updateBioCat('biodata')">Biodata</div>
                        <div id="biocat-keahlian" class="item cat" onclick="updateBioCat('keahlian')">Keahlian</div>
                        <div id="biocat-pengalaman" class="item cat" onclick="updateBioCat('pengalaman')">Pengalaman</div>
                    </div>
                    <div class="content" id="content-biodata">
                        <div class="content-item">
                            <div class="label">Lokasi</div>
                            <div class="value">{{ @$data->location_->name }}</div>
                        </div>
                        <div class="content-item">
                            <div class="label">Umur</div>
                            <div class="value">
                                @php
                                    echo \Carbon\Carbon::parse($data->birthday)->age
                                @endphp
                                Tahun
                            </div>
                        </div>
                        <div class="content-item">
                            <div class="label">Range Gaji</div>
                            <div class="value">
                                
                                Rp. {{ number_format($data->salary_range_start, 0, '.', '.') }}
                                -
                                Rp. {{ number_format($data->salary_range_end, 0, '.', '.') }}
                            </div>
                        </div>
                        <div class="content-item">
                            <div class="label">Kondisi</div>
                            <div class="value">{{ $data->condition }}</div>
                        </div>
                        {{-- <div class="content-item">
                            <div class="label">Penempatan Kerja</div>
                            <div class="value">{{ @$data->placement_location->name }}</div>
                        </div> --}}
                        <div class="content-item">
                            <div class="label">Tinggi Badan</div>
                            <div class="value">{{  number_format($data->height, 0) }} CM</div>
                        </div>
                        <div class="content-item">
                            <div class="label">Berat Badan</div>
                            <div class="value">{{  number_format($data->weight, 0) }} KG</div>
                        </div>
                        <div class="content-item">
                            <div class="label">Warna Kulit</div>
                            <div class="value">{{  @$data->skin_tone }}</div>
                        </div>
                        <div class="content-item">
                            <div class="label">Pendidikan</div>
                            <div class="value">{{ $data->education }}</div>
                        </div>
                    </div>
                    <div class="content" id="content-keahlian">
                        @foreach ($data->skills as $skill)
                            <div class="content-item">
                                <div class="label"> <i class="fa-solid fa-circle-check"></i> &nbsp; {{ $skill->skill }}</div>
                            </div>
                        @endforeach
                    </div>
                    <div class="content" id="content-pengalaman">
                        <div class="content-item">
                            <div class="label">Detail Pengalaman : </div>
                        </div>
                        <div class="content-item">
                            <div class="label">{{ $data->experience }}</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contract">
                <h5>Form Pengajuan Kontrak</h5>
                <form method="POST" action="/apperfind/contract/{{ $data->id }}">
                    @csrf
                    @if(Auth::user()->role == 'superuser')
                        <div class="items">
                            <div class="label"> <span class="label">Pilih Customer</span> </div>
                            <div class="value">
                                <select class="form-control" id="customer_id" name="customer_id" onchange="changeCustomer()">
                                    <option value="0">-- Pilih Customer --</option>
                                    @foreach ($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="items">
                            <div class="label"> <span class="label">Nama Pengaju</span> </div>
                            <div class="value"> <input id="customer_name" class="form-control" type="text" name="name" required placeholder="Masukkan nama pengaju"> </div>
                        </div>
                    @else
                        <div class="items">
                            <div class="label"> <span class="label">Nama Pengaju</span> </div>
                            <div class="value"> <input class="form-control" type="text" name="name" required placeholder="Masukkan nama pengaju" value="{{ Auth::user()->name }}"> </div>
                        </div>
                    @endif
                    <div class="items">
                        <div class="label"> <span class="label">Kontak Pengaju</span> </div>
                        <div class="value"> <input class="form-control" type="text" name="contact" placeholder="08xxxxxxx" required> </div>
                    </div>
                    <div class="items">
                        <div class="label"> <span class="label">Alamat Pengaju</span> </div>
                        <div class="value"> <input class="form-control" type="text" name="address" placeholder="Masukkan alamat lengkap anda" required> </div>
                    </div>
                    <div class="items">
                        <div class="label"> <span class="label">Penempatan</span> </div>
                        <div class="value">
                            <select class="form-control" disabled id="domisili-input">
                                <option value="0">-- Pilih Lokasi --</option>
                                @foreach ($locations as $loc)
                                    <option value="{{ $loc->id }}" @selected($loc->id == $data->location_id)>{{ $loc->name }}</option>
                                @endforeach
                            </select>
                            {{-- <input id="domisili-input" class="form-control" type="text" value="{{ $data->location }}" name="name" disabled> --}}
                        </div>
                    </div>
                    <div class="items">
                        <div class="label">
                            <label><input type="checkbox" id="checkbox-domisili" name="outside_address" value="value"> &nbsp; Ajukan penempatan di luar domisili</label>
                        </div>
                    </div>
                    <div class="items">
                        <div class="label"> <span class="label">Rencana Masa Kontrak</span> </div>
                        <div class="value row">
                            <div class="col-md-6">
                                <input name="plan_number" type="number" class="form-control" placeholder="Nominal"/>
                            </div>
                            <div class="col-md-6">
                                <select name="plan_type" class="form-control">
                                    <option value="bulan">Bulan</option>
                                    <option value="tahun">Tahun</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="items">
                        <div class="label"> <span class="label">Skema Pembayaran</span> </div>
                        <div class="value">
                            <select name="payment_type" class="form-control" id="payment">
                                <option value="full">Full Payment</option>
                                <option value="dp">Down Payment</option>
                            </select>
                        </div>
                    </div>
                    <div class="items" id="downpayment" style="display: none">
                        <div class="label"> <span class="label">Nomimal DP (Rp)</span> </div>
                        <div class="value"> <input class="form-control" type="text" name="dp_amount"> </div>
                    </div>
                    <div class="items">
                        <div class="label"> <span class="label">Nomimal Pembayaran (Rp)</span> </div>
                        <div class="value"> <input class="form-control" type="text" name="amount" required> </div>
                    </div>
                    <div class="items">
                        <div class="label"> <span class="label">Catatan Khusus</span> </div>
                        <div class="value"> <textarea name="note" class="form-control textarea" placeholder="Catatan tambahan "></textarea></div>
                    </div>
                    <button type="submit">Ajukan</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section("extrascript")
<script>
    let domisili = "{{ $data->location_id }}";
    $(document).ready(() => {
        $(".content").hide();
        $("#content-biodata").show();
    });
    function updateBioCat(cat){
        $(".cat").attr("class", "item cat");
        $(`#biocat-${cat}`).attr("class", "item cat active");
        $(".content").hide();
        $(`#content-${cat}`).show();
    }

    $("#checkbox-domisili").change(() => {
        if ($("#checkbox-domisili").is(":checked")) {
            $("#domisili-input").attr("disabled", false);
        } else {
            $("#domisili-input").attr("disabled", true);
            $("#domisili-input").val(domisili);
        }
    });

    $("#payment").change(() => {
        if ($("#payment").val() == "dp") {
            $("#downpayment").show();
        } else {
            $("#downpayment").hide();
        }
    });
    function changeCustomer(){
        const custElem = $("#customer_id");
        const cust = @json($customers);
        const selectedCust = cust.find(i => i.id == custElem.val());
        $("#customer_name").val(selectedCust.name);
        console.log(custElem.val(), cust);
    }

</script>
@endsection