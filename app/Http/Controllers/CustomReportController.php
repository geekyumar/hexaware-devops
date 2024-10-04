<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CustomReports;
use App\Models\JobApplications;
use Barryvdh\DomPDF\Facade\Pdf as PDF;
use Illuminate\Support\Facades\File;

class CustomReportController extends Controller
{
    public function index(Request $request){
        return view('custom-reports.index', ['reports' => CustomReports::all()]);
    }

    public function create(Request $request){

        $query = JobApplications::query();

        foreach ($request->all() as $field => $value) {
            $skip = ['_token', 'report_name', 'selected_fields'];
            if(in_array($field, $skip)){
                continue;
            }
            if (!empty($value)) {
                $query->where($field, $value);
            }
        }

        $data = $query->get();

        $html = '<head><meta charset="UTF-8"></head><h1>Custom Reports Data</h1>';
        $html .= '<h2>Report Name: ' . $request->post('report_name') . '</h2>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">';
        $html .= '<thead>';
        $html .= '<tr>';
        
        foreach ($request->post('selected_fields') as $field) {
            $html .= '<th>' . htmlspecialchars($field) . '</th>';
        }
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        
        foreach ($data as $datas) {
            $html .= '<tr>';
            foreach ($request->post('selected_fields') as $row) {
                $html .= '<td>' . htmlspecialchars($datas->$row) . '</td>';
            }
            $html .= '</tr>';
        }
        
        $html .= '</tbody>';
        $html .= '</table>';

        $fileName = 'custom-reports-' . time() . '.pdf';

        $pdf = Pdf::loadHTML($html)->save(public_path('pdfs/' . $fileName));

        $report = new CustomReports();
        $report->fill($request->post());
        $report->report_pdf = $fileName;
        $report->created_by = auth()->user()->name;
        $report->save();

        return redirect('/custom-reports');
    }

    public function view(Request $request, $id){
        return view('custom-reports.view', ['report' => CustomReports::where('id', $id)->first(), 'application' => JobApplications::all()]);
    }

    public function editPage(Request $request, $id){
        return view('custom-reports.edit', ['report' => CustomReports::where('id', $id)->first()]);
    }

    public function edit(Request $request, $id){

        $report_data = CustomReports::where('id', $id)->first();
        $report_filename = $report_data->report_pdf;

        $query = JobApplications::query();

        foreach ($request->all() as $field => $value) {
            $skip = ['_token', 'report_name', 'selected_fields'];
            if(in_array($field, $skip)){
                continue;
            }
            if (!empty($value)) {
                $query->where($field, $value);
            }
        }

        $data = $query->get();

        $html = '<head><meta charset="UTF-8"></head><h1>Custom Reports Data</h1>';
        $html .= '<h2>Report Name: ' . $report_data->report_name . '</h2>';
        $html .= '<table border="1" cellpadding="5" cellspacing="0" style="width: 100%;">';
        $html .= '<thead>';
        $html .= '<tr>';

        foreach ($request->post('selected_fields') as $field) {
            $html .= '<th>' . htmlspecialchars($field) . '</th>';
        }
        $html .= '</tr>';
        $html .= '</thead>';
        $html .= '<tbody>';
        
        foreach ($data as $datas) {
            $html .= '<tr>';
            foreach ($request->post('selected_fields') as $row) {
                $html .= '<td>' . htmlspecialchars($datas->$row) . '</td>';
            }
            $html .= '</tr>';
        }
        
        $html .= '</tbody>';
        $html .= '</table>';

        $fileName = 'custom-reports-' . time() . '.pdf';

        if (File::exists(public_path("pdfs/$report_filename"))) {
            File::delete(public_path("pdfs/$report_filename"));
        } else {
            return response()->json(['error' => 'the report file is not found!']);
        }

        $pdf = Pdf::loadHTML($html)->save(public_path('pdfs/' . $fileName));

        $newData = [
            'report_name' => $request->post('report_name'),
            'report_pdf' => $fileName,
            'selected_fields' => $request->post('selected_fields')
        ];

        CustomReports::where('id', $id)->update($newData);

        return redirect('/custom-reports');

    }

    public function delete(Request $request, $id){
        $report_data = CustomReports::where('id', $id)->first();

        if(File::exists(public_path('pdfs/' . $report_data->report_pdf))){
            File::delete(public_path('pdfs/' . $report_data->report_pdf));
        } else {
            return response()->json(['error' => 'the report file is not found!']);
        }

        $report_data->delete();
        return redirect('/custom-reports');
    }
}
