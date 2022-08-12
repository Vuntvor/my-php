<?php

namespace App\Http\Controllers;

use App\Models\Node;
use Illuminate\Http\Request;

class NodeController
{
    public function my_test(Request $request)
    {
        $nodeQuery = Node::query();
        if ($request->post('form-select-title')) {
            $nodeQuery->where('title', 'LIKE', '%' . $request->get('form-select-title') . '%');
        }
        return view(
            'layouts/testing_page',
            [
                'all_node' => $nodeQuery->get(),
                 'form-select-title' => $request->post('form-select-title'),
                dd($request)
            ]
        );

    }
    public function list(Request $request)
    {
//        $firstNode = Node::first();
//        $allNode = Node::all();
        $nodeQuery = Node::query();
        if ($request->get('filter-by-text')) {
            $nodeQuery->where('content', 'LIKE', '%' . $request->get('filter-by-text') . '%');
        }
        if ($request->get('filter-by-title')) {
            $nodeQuery->where('title', 'LIKE', '%' . $request->get('filter-by-title') . '%');
        }
        if ($request->get('form-select-title')) {
            $nodeQuery->where('title', 'LIKE', '%' . $request->get('form-select-title') . '%');
        }
        return view(
            'layouts/tables',
            [
                'allNodes' => $nodeQuery->get(),
                'filterByText' => $request->get('filter-by-text'),
                'filter_by_title' => $request->get('filter-by-title'),
            ]
        );
    }

    public function addOrEdit(Request $request)
    {
        $oneNode = null;
        if ($request->route()->named('edit-node')) {
            $nodeId = $request->route()->parameter('nodeId');
            $oneNode = Node::find($nodeId);
        }

        return view(
            'layouts/add',
            [
                'node' => $oneNode ?? null,
            ]
        );
    }

    public function addProcess(Request $request)
    {
        $nodeData = $request->post('form-node');

        $newNode = new Node();
        $newNode->title = $nodeData['form-title'];
        $newNode->content = $nodeData['form-content'];
        $newNode->save(); // INSERT INTO notes ('title', 'content') VALUES ('qqq', 'www')

        return redirect('/node');
    }

    public function editProcess(Request $request)
    {
        $nodeData = $request->post('form-node');

        $nodeId = $request->route()->parameter('nodeId');
        $node = Node::find($nodeId);
        $node->title = $nodeData['form-title'];
        $node->content = $nodeData['form-content'];
        $node->save();

        return redirect('/node');
    }

    public function delete(Request $request)
    {
        $nodeId = $request->route()->parameter('nodeId');
        $node = Node::find($nodeId);
        $node->delete(); // DELETE FROM notes WHERE id = {id}

        return redirect('/node');
    }
}

