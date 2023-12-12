import { ComponentFixture, TestBed } from '@angular/core/testing';
import { DicasPage } from './dicas.page';

describe('DicasPage', () => {
  let component: DicasPage;
  let fixture: ComponentFixture<DicasPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(DicasPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
