<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MA_Laporan extends CI_Model
{


    function getSuplier($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        $searchNama = $postData['searchNama'];
        $searchBulan = $postData['searchBulan'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_barang like '%" . $searchValue . "%'  ) ";
        }
        // if ($searchSuplier != '') {
        //     $search_arr[] = " nama_suplier='" . $searchSuplier . "' ";
        // }
        if ($searchNama != '') {
            $search_arr[] = " nama_suplier='" . $searchNama . "' ";
        }
        if ($searchBulan == '0') {
            $search_arr[] = " nama_suplier='" . $searchNama . "' ";
        } else {
            $search_arr[] = " tgl_masuk_barang like'%" . $searchBulan . "%' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $records  = $this->db->get('barang')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $records  = $this->db->get('barang')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);

        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $records  = $this->db->get('barang')->result();

        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                "id_barang" => $record->id_barang,
                "nama_barang" => $record->nama_barang,
                "harga_beli" => $record->harga_beli,
                "stok_barang" => $record->stok_barang,
                "tgl_masuk_barang" => $record->tgl_masuk_barang,
                "nama_suplier" => $record->nama_suplier
            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }


    function getPenjualan($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];

        $searchBulan = $postData['searchBulan'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_barang like '%" . $searchValue . "%'  ) ";
        }
        // if ($searchSuplier != '') {
        //     $search_arr[] = " nama_suplier='" . $searchSuplier . "' ";
        // }

        if ($searchBulan != '') {
            $search_arr[] = " tgl_masuk_barang like'%" . $searchBulan . "%' ";
        }
        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->join('konfirmasi_pemesanan', 'pemesanan.id_trans=konfirmasi_pemesanan.id_trans');
        $this->db->where('status_pembayaran', 'Sudah Bayar');
        $records  = $this->db->get('pemesanan')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->join('konfirmasi_pemesanan', 'pemesanan.id_trans=konfirmasi_pemesanan.id_trans');
        $this->db->where('status_pembayaran', 'Sudah Bayar');
        $records  = $this->db->get('pemesanan')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by('barang.id_barang');
        $this->db->limit($rowperpage, $start);
        $this->db->join('barang', 'barang.id_barang=pemesanan.id_barang');
        $this->db->join('konfirmasi_pemesanan', 'pemesanan.id_trans=konfirmasi_pemesanan.id_trans');
        $this->db->where('status_pembayaran', 'Sudah Bayar');
        $records  = $this->db->get('pemesanan')->result();

        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                "id_barang" => $record->id_barang,
                "nama_barang" => $record->nama_barang,
                "harga_beli" => $record->harga_beli,
                "stok_barang" => $record->stok_barang,
                "tgl_masuk_barang" => $record->tgl_masuk_barang,

            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }

    function getSuplier2($postData = null)
    {

        $response = array();

        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page
        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value

        // Custom search filter 
        // $searchSuplier = $postData['searchSuplier'];
        // $searchNama = $postData['searchNama'];
        $searchBulan = $postData['searchBulan'];


        ## Search 
        $search_arr = array();
        $searchQuery = "";
        if ($searchValue != '') {
            $search_arr[] = " (nama_barang like '%" . $searchValue . "%'  ) ";
        }

        if ($searchBulan != '0') {
            $search_arr[] = " tgl_masuk_barang like'%" . $searchBulan . "%' ";
        }

        if (count($search_arr) > 0) {
            $searchQuery = implode(" and ", $search_arr);
        }

        ## Total number of records without filtering
        $this->db->select('count(*) as allcount');
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $records  = $this->db->get('barang')->result();
        $totalRecords = $records[0]->allcount;

        ## Total number of record with filtering
        $this->db->select('count(*) as allcount');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $records  = $this->db->get('barang')->result();
        $totalRecordwithFilter = $records[0]->allcount;

        ## Fetch records
        $this->db->select('*');
        if ($searchQuery != '')
            $this->db->where($searchQuery);
        $this->db->order_by($columnName, $columnSortOrder);
        $this->db->limit($rowperpage, $start);
        $this->db->group_by('id_suplier');
        $this->db->join('suplier', 'barang.id_suplier=suplier.id_suplier');
        $records  = $this->db->get('barang')->result();

        $data = array();

        foreach ($records as $record) {


            $data[] = array(
                "id_suplier" => $record->id_suplier,
                "nama_suplier" => $record->nama_suplier,
                "tgl_masuk_barang" => $record->tgl_masuk_barang,
                "stok_barang" => $record->stok_barang,
                "tgl_masuk_barang" => $record->tgl_masuk_barang,
                "total_bayar" => $record->stok_barang * $record->harga_beli
            );
        }


        ## Response
        $response = array(
            "draw" => intval($draw),
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordwithFilter,
            "aaData" => $data
        );

        return $response;
    }
}
