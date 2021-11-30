<?php

namespace Mia\Page\Handler;

use Mia\Core\Helper\StringHelper;

/**
 * Description of SaveHandler
 * 
 * @OA\Post(
 *     path="/mia_page/save",
 *     summary="MiaPage Save",
 *     tags={"MiaPage"},
*      @OA\RequestBody(
 *         description="Object",
 *         required=true,
 *         @OA\MediaType(
 *             mediaType="application/json",
 *             @OA\Schema(ref="#/components/schemas/MiaPage")
 *         )
 *     ),
 *     @OA\Response(
 *          response=200,
 *          description="successful operation",
 *          @OA\JsonContent(ref="#/components/schemas/MiaPage")
 *     ),
 *     security={
 *         {"bearerAuth": {}}
 *     },
 * )
 *
 * @author matiascamiletti
 */
class SaveHandler extends \Mia\Auth\Request\MiaAuthRequestHandler
{
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \Psr\Http\Message\ResponseInterface
     */
    public function handle(\Psr\Http\Message\ServerRequestInterface $request): \Psr\Http\Message\ResponseInterface 
    {
        // Get Current User
        $user = $this->getUser($request);
        // Obtener item a procesar
        $item = $this->getForEdit($request);
        // Guardamos data
        $item->title = $this->getParam($request, 'title', '');
        $item->slug = StringHelper::createSlug($item->title);
        $item->data = $this->getParam($request, 'data', []);
        $item->seo_title = $this->getParam($request, 'seo_title', '');
        $item->seo_keywords = $this->getParam($request, 'seo_keywords', '');
        $item->seo_description = $this->getParam($request, 'seo_description', '');

        $item->type = intval($this->getParam($request, 'type', '0'));

        $item->status = intval($this->getParam($request, 'status', '0'));
        $item->visibility = intval($this->getParam($request, 'visibility', '0'));

        $item->published_date = $this->getParam($request, 'published_date', null);

        $item->is_archive = intval($this->getParam($request, 'is_archive', '0'));
        $item->last_updated_user = $user->id;

        $item->parent_id = $this->getParam($request, 'parent_id', null);
        
        try {
            $item->save();
        } catch (\Exception $exc) {
            return new \Mia\Core\Diactoros\MiaJsonErrorResponse(-2, $exc->getMessage());
        }

        // Devolvemos respuesta
        return new \Mia\Core\Diactoros\MiaJsonResponse($item->toArray());
    }
    
    /**
     * 
     * @param \Psr\Http\Message\ServerRequestInterface $request
     * @return \App\Model\MiaPage
     */
    protected function getForEdit(\Psr\Http\Message\ServerRequestInterface $request)
    {
        // Obtenemos ID si fue enviado
        $itemId = $this->getParam($request, 'id', '');
        // Buscar si existe el item en la DB
        $item = \Mia\Page\Model\MiaPage::find($itemId);
        // verificar si existe
        if($item === null){
            return new \Mia\Page\Model\MiaPage();
        }
        // Devolvemos item para editar
        return $item;
    }
}