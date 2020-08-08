<?php

namespace App\Http\Controllers\Backend\Admin\System;

use App\Http\Controllers\Controller;
use App\Models\System\SystemPageSection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class SystemPageSectionsController extends Controller
{

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $system_page_sections = SystemPageSection::whereSystemPageId($request->system_page_id)->get();

        return response()->json(['data' => $system_page_sections]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function ajaxGetById(Request $request): JsonResponse
    {
        $system_page_section = SystemPageSection::whereId($request->id)->first();

        return response()->json([
            'success' => true,
            'data' => $system_page_section,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function ajaxUpdate(Request $request): JsonResponse
    {
        $system_page_section = SystemPageSection::whereId($request->section_id)->first();

        $system_page_section->title = $request->title;
        $system_page_section->header = $request->header;
        $system_page_section->subheader = $request->subheader;
        $system_page_section->order = $request->order;
        $system_page_section->body = $request->body;
        $system_page_section->save();

        return response()->json([
            'success' => true,
            'data' => $system_page_section,
        ]);
    }

    /**
     * @param Request $request
     *
     * @return JsonResponse
     */
    public function ajaxStore(Request $request): JsonResponse
    {
        $system_page_section = new SystemPageSection();
        $system_page_section->system_page_id = $request->input('page_id');
        $system_page_section->title = $request->input('title');
        $system_page_section->header = $request->input('header');
        $system_page_section->subheader = $request->input('subheader');
        $system_page_section->order = $request->input('order');
        $system_page_section->body = $request->input('body');

        $system_page_section->save();

        return response()->json([
            'success' => true,
            'data' => $system_page_section,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @param         $id
     *
     * @return JsonResponse
     */
    public function update(Request $request, $id)
    {
        $system_page_section = SystemPageSection::whereId($request->section_id)->first();

        $system_page_section->title = $request->title;
        $system_page_section->header = $request->header;
        $system_page_section->subheader = $request->subheader;
        $system_page_section->order = $request->order;
        $system_page_section->body = $request->body;
        $system_page_section->save();

        return response()->json([
            'success' => true,
            'data' => $system_page_section,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
