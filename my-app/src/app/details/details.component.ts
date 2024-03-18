import { Component, inject } from '@angular/core';
import { HttpClient, HttpClientModule } from "@angular/common/http";
import { ActivatedRoute } from "@angular/router";

@Component({
  selector: 'app-details',
  standalone: true,
  imports: [
    HttpClientModule,
  ],
  templateUrl: './details.component.html',
  styleUrl: './details.component.css'
})
export class DetailsComponent {

  httpClient = inject(HttpClient);
  route: ActivatedRoute = inject(ActivatedRoute);
  data: any = [];

  ngOnInit(): void {
    this.fetchData()
  }

  groupId = parseInt(this.route.snapshot.params['id'], 10);
  fetchData() {
    this.httpClient
      .get('https://localhost:8000/api/group/' + this.groupId)
      .subscribe((data: any) => {
        console.log(data);
        this.data = data;
      });
  }
}
