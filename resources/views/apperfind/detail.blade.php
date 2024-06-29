@extends('layouts.app')

@section('content')
    <div class="container">
        <h3 style="margin-left: 40px">
            <a style="text-decoration: none; color:unset" href="/apperfind"><i class="fa fa-arrow-left"></i></a> &nbsp;
            Detail PRT
        </h3>
        <div class="apperfind-detail">
            <div class="photo-section">
                <div class="main-photo">
                    <img src="{{ $data->image1 ?? "/img/logo-w.png"}}">
                </div>
                <div class="alt-photo">
                    <div class="alt-photo-item"><img src="{{ $data->image2 ?? "/img/logo-w.png"}}"></div>
                    <div class="alt-photo-item"><img src="{{ $data->image3 ?? "/img/logo-w.png"}}"></div>
                    <div class="alt-photo-item"><img src="{{ $data->image4 ?? "/img/logo-w.png"}}"></div>
                </div>
            </div>
            <div class="detail">
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
                <a href="/apperfind/contract/{{ $data->id }}" class="submit-button">Ajukan Kontrak</a>
            </div>
        </div>
    </div>
@endsection

@section("extrascript")
<script>
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
</script>
@endsection