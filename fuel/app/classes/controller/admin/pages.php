<?php
class Controller_Admin_Pages extends Controller_Admin
{

	public function action_index()
	{
		$data['pages'] = Model_Page::find('all');
		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/index', $data);

	}

	public function action_view($id = null)
	{
		$data['page'] = Model_Page::find($id);

		$this->template->title = "Page";
		$this->template->content = View::forge('admin/pages/view', $data);

	}

	public function action_create()
	{
		if (Input::method() == 'POST')
		{
			$val = Model_Page::validate('create');

			if ($val->run())
			{
				$page = Model_Page::forge(array(
					'title' => Input::post('title'),
					'slug' => Input::post('slug'),
					'summary' => Input::post('summary'),
					'body' => Input::post('body'),
					'publisher' => Input::post('publisher'),
				));

				if ($page and $page->save())
				{
					Session::set_flash('success', e('Added page #'.$page->id.'.'));

					Response::redirect('admin/pages');
				}

				else
				{
					Session::set_flash('error', e('Could not save page.'));
				}
			}
			else
			{
				Session::set_flash('error', $val->error());
			}
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/create');

	}

	public function action_edit($id = null)
	{
		$page = Model_Page::find($id);
		$val = Model_Page::validate('edit');

		if ($val->run())
		{
			$page->title = Input::post('title');
			$page->slug = Input::post('slug');
			$page->summary = Input::post('summary');
			$page->body = Input::post('body');
			$page->publisher = Input::post('publisher');

			if ($page->save())
			{
				Session::set_flash('success', e('Updated page #' . $id));

				Response::redirect('admin/pages');
			}

			else
			{
				Session::set_flash('error', e('Could not update page #' . $id));
			}
		}

		else
		{
			if (Input::method() == 'POST')
			{
				$page->title = $val->validated('title');
				$page->slug = $val->validated('slug');
				$page->summary = $val->validated('summary');
				$page->body = $val->validated('body');
				$page->publisher = $val->validated('publisher');

				Session::set_flash('error', $val->error());
			}

			$this->template->set_global('page', $page, false);
		}

		$this->template->title = "Pages";
		$this->template->content = View::forge('admin/pages/edit');

	}

	public function action_delete($id = null)
	{
		if ($page = Model_Page::find($id))
		{
			$page->delete();

			Session::set_flash('success', e('Deleted page #'.$id));
		}

		else
		{
			Session::set_flash('error', e('Could not delete page #'.$id));
		}

		Response::redirect('admin/pages');

	}

}
