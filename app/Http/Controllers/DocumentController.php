<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Document;
use File;

class DocumentController extends Controller {

    public function index() {
        $docs = Document::get();
        return view('document.index')->with(compact('docs'));
    }

    public function create() {
        return view('document.create');
    }

    public function store(Request $request) {
        $rules = [
            'name' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048',
            'excel' => 'required|mimes:xlx,xls,xlsx|max:2048',
        ];

        $message = [
            'pdf.mimes' => 'The file must be a pdf file.',
            'excel.mimes' => 'The file must be an excel file.',
        ];

        $request->validate($rules, $message);
        $document = new Document();
        $document->name = $request->name;
        //Excel file upload
        $excelFilePath = 'public/uploads/excelFile';
        $excelFileName = uniqid() . "." . $request->file('excel')->getClientOriginalExtension();
        $request->file('excel')->move($excelFilePath, $excelFileName);
        $document->excel_file = $excelFileName;

        //Pdf file upload
        $pdfFilePath = 'public/uploads/pdfFile';
        $pdfFileName = uniqid() . "." . $request->file('pdf')->getClientOriginalExtension();
        $request->file('pdf')->move($pdfFilePath, $pdfFileName);
        $document->pdf_file = $pdfFileName;

        if ($document->save()) {
            return redirect('document')->with('create', 'Document added successfully');
        }
    }

    public function edit($id) {
        $doc = Document::find($id);
        return view('document.edit')->with(compact('doc'));
    }

    public function update(Request $request, $id) {
        $rules = [
            'name' => 'required',
            'pdf' => 'required|mimes:pdf|max:2048',
            'excel' => 'required|mimes:xlx,xls,xlsx|max:2048',
        ];

        $message = [
            'pdf.mimes' => 'The file must be a pdf file.',
            'excel.mimes' => 'The file must be an excel file.',
        ];

        // $request->validate($rules, $message);
        $doc = Document::find($id);
        $doc->name = $request->get('name');
        //Update excel file and update file from folder
        if (!empty($request->file('excel'))) {
            $excelFilePath = 'public/uploads/excelFile';
            $excelFileName = uniqid() . "." . $request->file('excel')->getClientOriginalExtension();
            $request->file('excel')->move($excelFilePath, $excelFileName);


            //Update with Folder
            $filePath = public_path("uploads/excelFile/" . $doc->excel_file);

            if (File::exists($filePath))
                File::delete($filePath);
            $doc->excel_file = $excelFileName;
        }

        //Update pdf file and update file from folder
        if (!empty($request->file('pdf'))) {
            $pdfFilePath = 'public/uploads/pdfFile';
            $pdfFileName = uniqid() . "." . $request->file('pdf')->getClientOriginalExtension();
            $request->file('pdf')->move($pdfFilePath, $pdfFileName);


            //Update with Folder
            $filePath2 = public_path("uploads/pdfFile/" . $doc->pdf_file);
            if (File::exists($filePath2))
                File::delete($filePath2);
            $doc->pdf_file = $pdfFileName;
        }

        $doc->save();

        return redirect('document')->with('update', 'Document have been  updated!');

        //
    }

    public function destroy($id) {
        
        $doc = Document::find($id);
        //Excel file delete from folder
        $filePath = public_path("uploads/excelFile/" . $doc->excel_file);
        if (File::exists($filePath))
            File::delete($filePath);
        
        //Pdf file delete from folder
        $filePath2 = public_path("uploads/pdfFile/" . $doc->pdf_file);
        if (File::exists($filePath2))
            File::delete($filePath2);
        
        //Delete from Database
        $doc->delete();

        return redirect('document')->with('delete', 'Document have been deleted!');
    }
    //Excel file download
    public function getExcelFile($id) {
        $doc = Document::find($id);
        return response()->download(public_path('uploads/excelFile/' . $doc->excel_file));
    }
    //Pdf file download
    public function getPdfFile($id) {
        $doc = Document::find($id);
        return response()->download(public_path('uploads/pdfFile/' . $doc->pdf_file));
    }
    //End Document controller class
}
