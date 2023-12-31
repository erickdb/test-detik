                @php
                    $no = 1;
                @endphp
                @foreach ($buku as $row)
                    <tr>
                        <td class="text-center">{{ $no++ }}</td>
                        <td class="text-center">{{ ucfirst($row->judul) }}</td>
                        <td class="text-center">{{ ucfirst($row->getKategori->nama_kategori) }}</td>
                        <td class="text-center">{{ ucfirst($row->getUser->name) }}</td>
                        <td class="text-center">{{ ucfirst($row->deskripsi) }}</td>
                        <td class="text-center">{{ ucfirst($row->jumlah) }}</td>
                        <td class="text-center">
                            @if ($row->file)
                                <span>{{ $row->file }}</span>
                                <br>
                                <a href="{{ route('fileBuku.download', $row->file) }}" data-toggle="modal"><i
                                    data-toggle="tooltip" title="Download">Download</i></a>
                            @else
                                <span>File buku tidak tersedia</span>
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($row->cover)
                                <img width="50px" src="{{ asset('assets/'.$row->cover) }}" alt="">
                            @else
                                <span>Cover buku tidak tersedia</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <a href="{{ route('buku.view.edit',$row->id) }}" class=""><i
                                        class="bi bi-pencil-square" data-toggle="tooltip" title="Edit"></i></a>

                                <form class="delete" method="POST" action={{ route('buku.delete',['id' => $row->id]) }}
                                    id="deleteBukuForm{{ $row->id }}">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-none p-0">
                                        <i class="bi bi-trash3-fill" data-toggle="tooltip" title="Delete"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach