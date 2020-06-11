<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Country;
use Laravel\Nova\Fields\Date;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Place as PlaceField;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\Textarea;

class Place extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = \App\Place::class;

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'name', 'description',
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
            ID::make()->sortable(),

            Text::make('Name')->sortable(),

            $this->addressFields(),

            Date::make('Start Date')->sortable(),

            Textarea::make('Description'),
        ];
    }

    /**
     * Get the address fields for the resource.
     *
     * @return \Illuminate\Http\Resources\MergeValue
     */
    protected function addressFields()
    {
        return $this->merge([
            PlaceField::make('City')->onlyCities(),

            Country::make('Country')->hideFromIndex(),

            Text::make('Latitude')->hideFromIndex()
            ->withMeta(['extraAttributes' => [
                'readonly' => true,
            ]]),

            Text::make('Longitude')->hideFromIndex()
            ->withMeta(['extraAttributes' => [
                'readonly' => true,
            ]]),
        ]);
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
