@extends('layouts.app')

@section('content')
    <div class="container">
        @if ($message != null)
            <div class="alert alert-danger alert-dismissible fade show" role="alert">{{ $message }}</div>
        @endif
        <h3>Tambah PRT</h3>
        <form class="data-table" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-data">
                <div class="items">
                    <div class="value">
                        @for ($i = 0; $i < 4; $i++)
                            <input accept="image/*" type='file' id="imgInp{{$i+1}}" name="file[]" class="hidden" multiple/>
                        @endfor
                    </div>
                </div>
                <div class="product-image row">
                    @for ($i = 0; $i < 4; $i++)
                        <div
                            class="image-container"
                            id="imgCntnr{{$i+1}}"
                            onclick="viewImage(this)">
                            <span id="upload-icon-{{$i+1}}" class="upload-image">
                                <i class="fa-solid fa-cloud-arrow-up"></i>
                                <span class="label"><br>Upload</span>
                            </span>
                            <span
                                class="bi bi-x-circle-fill remove-image"
                                id="removeImg{{$i+1}}"
                                onclick="closeThis(this)">
                                <i class="fa-solid fa-trash"></i>
                                <span class="label"><br>Remove</span>
                            </span>
                            <img id="blah{{$i+1}}" name="file[]"/>
                            <div id="overlay-{{$i+1}}" class="overlay"></div>
                        </div>
                    @endfor
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Nama</span>   <span class="required">*</span>  </div>
                    <div class="value"> <input class="form-control" type="text" name="name" required> </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Tipe PRT</span> </div>
                    <div class="value">
                        <select class="form-control" name="type_id">
                            <option class="0">---</option>
                            @foreach ($type as $t)
                                <option value="{{ $t->id }}">{{ @$t->type }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Lokasi</span>  <span class="required">*</span>  </div>
                    {{-- <div class="value"> <input class="form-control" type="text" name="location" required> </div> --}}

                    <div class="value">
                        <select class="form-control" name="location_id">
                            <option value=0>-- Pilih Lokasi --</option>
                            @foreach ($locations as $loc)
                                <option value="{{ @$loc->id }}">{{ @$loc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Tanggal Lahir</span>  <span class="required">*</span>  </div>
                    <div class="value"> <input class="datepicker" type="date" name="birthday" required> </div>
                </div>
                <hr>
                <div class="items">
                    <div class="label"> <span class="label">Ekspektasi Gaji</span></div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Minimal</span>  <span class="required">*</span>  </div>
                    <div class="value"> <input class="form-control" type="number" name="salary_range_start" required> </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Maksimal</span>  <span class="required">*</span>  </div>
                    <div class="value"> <input class="form-control" type="number" name="salary_range_end" required> </div>
                </div>
                <hr>
                <div class="items">
                    <div class="label"> <span class="label">Kondisi</span>  <span class="required">*</span> </div>
                    <div class="value"> <input class="form-control" type="text" name="condition" placeholder="Sehat" required> </div>
                </div>
                {{-- <div class="items">
                    <div class="label"> <span class="label">Penempatan</span> <span class="required">*</span></div>
                    <div class="value">
                        <select class="form-control" name="placement">
                            <option value=0>-- Pilih Lokasi --</option>
                            @foreach ($locations as $loc)
                                <option value="{{ @$loc->id }}">{{ @$loc->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div> --}}

                <div class="items">
                    <div class="label"> <span class="label">Berat Badan</span> <span class="required">*</span></div>
                    <div class="value"> <input class="form-control" type="number" name="weight" required> </div>
                </div>

                <div class="items">
                    <div class="label"> <span class="label">Tinggi Badan</span> <span class="required">*</span></div>
                    <div class="value"> <input class="form-control" type="number" name="height" required> </div>
                </div>

                <div class="items">
                    <div class="label"> <span class="label">Warna Kulit</span> <span class="required">*</span></div>
                    <div class="value"> <input class="form-control" type="text" name="skin_tone" required> </div>
                </div>

                <div class="items">
                    <div class="label"> <span class="label">Tahun Pengalaman</span> <span class="required">*</span></div>
                    <div class="value"> <input class="form-control" type="number" name="experience_year" required> </div>
                </div>

                <div class="items">
                    <div class="label"> <span class="label">Rating</span> <span class="required">*</span></div>
                    <div class="value"> <input class="form-control" type="number" name="rating" step="0.01" required> </div>
                </div>

                <div class="items">
                    <div class="label"> <span class="label">Pendidikan</span> <span class="required">*</span></div>
                    <div class="value">
                        <select class="form-control" name="education">
                            <option class="0">---</option>
                            @foreach ($education as $e)
                                <option value="{{ @$e }}">{{ @$e }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="items">
                    <div class="label"> <span class="label">Pengalaman</span> <span class="required">*</span></div>
                    <div class="value"> <textarea name="experience" class="form-control textarea"></textarea></div>
                </div>

                <hr>
                <div class="items">
                    <div class="label"> <span class="label">Keahlian</span></div>
                    <div class="value">
                        <select class="form-control" name="skills[]" id="skill-options" select2 select2-hidden-accessible multiple="multiple">
                            <option class="0">---</option>
                            @foreach ($skill as $s)
                                <option value="{{ @$s->id }}">{{ @$s->skill }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="items">
                    <div class="label"></div>
                    <div class="value">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button> &nbsp;
                        <a href="/{{$url}}" class="btn btn-light"><i class="fa fa-arrow-left"></i></a>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section("extrascript")
<script>
    $(document).ready( () => {
        $("#poAvail").change( (e) => {
            $("#poTime").attr("disabled", e.target.value == 1 ? false : "disabled");
            $("#poTime").val(0);
        });
        $("#skill-options").select2({ placeholder: "Please select" });
    });

    function viewImage(val){
        console.log("view", val);
        let index_ = val.id.substr(-1);
        $(`#imgInp${index_}`).change( () => {
            const [file] = document.getElementById(`imgInp${index_}`).files
            if (file){
                const maxSize = 100 * 1024; // 100Kb
                if (file.size > maxSize) {
                    setTimeout(() => {
                        alert('File lebih dari 100Kb.');
                    }, 300);
                    document.getElementById(`imgInp${index_}`).value = "";
                    return
                }
                document.getElementById(`blah${index_}`).src = URL.createObjectURL(file)
                $(`#removeImg${index_}`).show();
                $(`#overlay-${index_}`).show();
                $(`#upload-icon-${index_}`).hide();
            }
        })
        if($(`#imgInp${index_}`).val() == ""){
            $(`#imgInp${index_}`).click();
        }
    }

    function closeThis(val){
        console.log("close");
        let index_ = val.id.substr(-1);
        if($(`#imgInp${index_}`).val() != ""){
            $(`#blah${index_}`).attr("src", "")
            $(`#removeImg${index_}`).hide();
            $(`#overlay-${index_}`).hide();
            $(`#upload-icon-${index_}`).show();
            setTimeout(() => {
                $(`#imgInp${index_}`).val("")
            }, 500);
        }
    }
</script>
@endsection