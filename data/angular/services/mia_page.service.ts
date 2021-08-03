import { Injectable } from '@angular/core';
import { MiaPage } from '../entities/mia_page';
import { MiaBaseCrudHttpService } from '@agencycoda/mia-core';
import { HttpClient } from '@angular/common/http';
import { environment } from 'src/environments/environment';

@Injectable({
  providedIn: 'root'
})
export class MiaPageService extends MiaBaseCrudHttpService<MiaPage> {

  constructor(
    protected http: HttpClient
  ) {
    super(http);
    this.basePathUrl = environment.baseUrl + 'mia-page';
  }
 
}