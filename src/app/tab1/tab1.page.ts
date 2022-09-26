import { Component } from '@angular/core';
import { Storage } from '@ionic/storage-angular';
@Component({
  selector: 'app-tab1',
  templateUrl: 'tab1.page.html',
  styleUrls: ['tab1.page.scss'],
})
export class Tab1Page {
  public name: string;
  constructor(private storage: Storage) {
    this.storage.get('isLoggedIn').then((val) => {
      console.log(val);
      this.name = val.nama;
    });
  }
}
