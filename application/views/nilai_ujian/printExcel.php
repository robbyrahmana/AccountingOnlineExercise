<?php
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=hasil.xls");

                echo table_open();

                // table header
                echo table_header(
                    array(
                        'NIM'=>'',
                        'Nama Mahasiswa'=>'',
                        'SKS Lulus'=>'',
                        'IPK'=>'',
                        'Pembimbing Akademik'=>'',
                        'No. Bukti Pembayaran'=>'',
                        'Tanggal'=>'',
                        'Nilai'=>'150'
                    )
                ); 

                // table content
                if (! $results) {
                    echo table_no_record(8);
                } else {
                    foreach($results as $data) {
                        $aksi = '';
                        if ($data->total_essai != 0) {
                            $aksi = '
                                        <td>
                                            <div class="box-tools">
                                                <a href="'.base_url('nilai_ujian/mahasiswa_essai/'.$data->id.'/'.$data->mahasiswa_id.'/'. $kelola_soal_id).'" type="button" class="btn btn-sm btn-flat btn-success">periksa '.$data->total_essai.' essai</a>&nbsp;&nbsp;
                                                
                                            </div>
                                        </td>
                                    ';
                        } else {
                            $aksi = '<td>'. $data->nilai .'</td>';
                        }

                        echo '<tr>';
                        echo '<td>'.$data->nim.'</td>';
                        echo '<td>'.$data->nama.'</td>';
                        echo '<td>'.$data->jumlah_sks.'</td>';
                        echo '<td>'.$data->ipk.'</td>';
                        echo '<td>'.$data->nama_dosen.'</td>';
                        echo '<td>'.$data->bukti_pembayaran.'</td>';
                        echo '<td>'.nice_date($data->tanggal, 'd - M - Y').'</td>';
                        echo $aksi;
                            // <a href="'.base_url($base_url.'/'.$data->id).'" type="button" class="btn btn-sm btn-flat btn-success"><i class="fa fa-eye"></i></a>
                        echo '</tr>';
                    }
                }

                echo table_close();

?>