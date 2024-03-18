import {Component, inject, OnInit} from '@angular/core';
import { CommonModule, JsonPipe} from "@angular/common";
import { HttpClient, HttpClientModule } from "@angular/common/http";
import { RouterModule } from '@angular/router';
import { RouterOutlet } from '@angular/router';
import {GroupService} from "../group.service";

@Component({
  selector: 'app-home',
  standalone: true,
  imports: [
    CommonModule,
    HttpClientModule,
    RouterModule,
    RouterOutlet
  ],
  templateUrl: './home.component.html',
  styleUrl: './home.component.css'
})
export class HomeComponent {

  httpClient = inject(HttpClient);
  groupService = inject(GroupService);
  data: any = [];

  ngOnInit(): void {
    this.fetchData()
  }

  fetchData() {
    this.httpClient
      .get('https://localhost:8000/api/groups')
      .subscribe((data: any) => {
        console.log(data);
        this.data = data;
      });
  }

  fileName = '';

  onFileSelected(event: any) {

    const file:File = event.target.files[0];
    if (file) {
      this.fileName = file.name;
      const formData = new FormData();
      formData.append("file", file);
      const upload$ = this.httpClient.post('https://localhost:8000/api/import', formData);
      upload$.subscribe()
    }
  }

}
