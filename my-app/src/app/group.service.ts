import { Injectable } from '@angular/core';
import {Observable} from "rxjs";

@Injectable({
  providedIn: 'root'
})
export class GroupService {

  url = 'http://localhost:8000/api/groups';

  async getAllGroups(): Promise<Observable<any>> {
    const data = await fetch(this.url);
    return await data.json() ?? [];
  }

}
