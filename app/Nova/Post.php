<?php

namespace App\Nova;

use Benjaminhirsch\NovaSlugField\Slug;
use Benjaminhirsch\NovaSlugField\TextWithSlug;
use Carlson\NovaLinkField\Link;
use Illuminate\Http\Request;
use Infinety\Filemanager\FilemanagerField;
use Laravel\Nova\Fields\BelongsToMany;
use Laravel\Nova\Fields\Boolean;
use Laravel\Nova\Fields\DateTime;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Markdown;
use Laravel\Nova\Fields\Text;

class Post extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\Post';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'title';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id', 'title', 'description',
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            Link::make('View', 'slug')
                ->details([
                    'href' => function () {
                        return config('app.url').'/blog/'.$this->slug;
                    },
                    'text' => function () {
                        return 'Open in new tab';
                    },
                    'newTab' => true,
                ])
                ->onlyOnDetail(),

            ID::make()->sortable(),

            TextWithSlug::make('Title')
                ->sortable()
                ->rules('required', 'max:120')
                ->slug('Slug'),

            Slug::make('Slug')
                ->withMeta(['extraAttributes' => [
                    'readonly' => true,
                ]]),

            FilemanagerField::make('Image')->displayAsImage(),

            Text::make('Embed Url'),

            Markdown::make('Content')
                ->sortable()
                ->rules('required'),

            Boolean::make('Is Original')
                ->sortable()
                ->rules('nullable', 'boolean'),

            DateTime::make('Published At')
                ->sortable()
                ->rules('nullable', 'date')
                ->help('Leave empty to keep as draft.'),

            BelongsToMany::make('Tags'),
        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
