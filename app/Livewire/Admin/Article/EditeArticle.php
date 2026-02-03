<?php
///SEFGR
namespace App\Livewire\Admin\Article;

use App\Models\Article;
use App\Models\Categorys;
use Livewire\Attributes\Layout;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditeArticle extends Component
{
    public $image,$body,$category_id,$title,$name,$article ;


    public function mount($article){
        $this->article=Article::query()->find($article);
        $this->title=$this->article->title;
        $this->body=$this->article->body;
        $this->category_id=$this->article->category_id;

    }
//    public function createArticle(){
//        $name = time().'.'.$this->image->getClientOriginalExtension();
//        $this->image->storeAs('photos/articles',$name,'public');
//        Article::query()->create([
//            'title'=>$this->title,
//            'body'=>$this->body,
//            'category_id'=>$this->category_id,
//            'image'=>$name,
//            'category_id'=>$this->category_id,
//
//        ]);
//        $this->reset('title','body','image');
//        session()->flash('mmessage','مقاله ویرایش شد');
//        // $this->redirect('/article');
//    }
    public function UpdateArticls(){
        if($this->image) {
                $name = time().'.'.$this->image->getClientOriginalExtension();
        $this->image->storeAs('photos/articles',$name,'public');
        }
        $this->article->update([
            'title'=>$this->title,
            'body'=>$this->body,
            'category_id'=>$this->category_id,
            'image'=>$this->image?$name:$this->article->image,
        ]);
        $this->reset('title','body','image');
        session()->flash('message',"کاربر ویرایش شد!");
//      $this->redirectRoute('Articls');
        $this->redirect('/Articls');
    }
    use WithFileUploads;
    #[Layout('Admin.master')]
    public function render()
    {
        $catagores=Categorys::query()->pluck('title','id');

        return view('livewire.admin.article.edite-article',compact('catagores'));
    }
}
