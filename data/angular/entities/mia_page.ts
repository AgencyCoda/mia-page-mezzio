import { MiaModel } from "@agencycoda/mia-core";

export class MiaPage extends MiaModel {
    id: number = 0;
    title: string = '';
    slug: string = '';
    data: string = '';
    seo_title: string = '';
    seo_keywords: string = '';
    seo_description: string = '';
    status: number = 0;
    visibility: number = 0;
    published_date: string = '';
    is_archive: number = 0;
    last_updated_user: number = 0;
    created_at: string = '';
    updated_at: string = '';
    deleted: number = 0;

}