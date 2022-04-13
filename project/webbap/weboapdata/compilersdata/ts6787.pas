Program HoarSort;
Const m = 100;
Type Index = 0..m;
     Vector = array [Index] of Integer;
Var n: Index;
    a: Vector;
    F,G: Text;
    first, last: INdex;

 Procedure inputMas (Var a: Vector; Var n: Index);
 Var i: Index;
 Begin
  Readln(n);
  For i:=1 to n do read(a[i]);

 End;

 Procedure QuickSort (Var a: Vector; first,last:Index);
 Var V: Integer;
     left, right: Index;
     Temp: Integer;
 Begin
  left:=first; right:=last;
  v:=a[(left+right) div 2];
  While left <= right do begin
   while a[left] < v do inc(left);
   while a[right] > v do dec(right);

   If left <= right then begin
    Temp:=a[left]; a[left]:=a[right]; a[right]:=Temp;
    inc(left); dec(right);
   end;
  end;

  If first < right
   Then QuickSort(a,first,right);
  If left<last
   Then QuickSort(a,left,last);
 End;

 Procedure PrintMas (Var a: Vector);
 Var i: Index;
 Begin

  For i:=1 to n do write(a[i],' ');

 End;

Begin
 inputMas (a,n);
 QuickSort (a,1,n);
 PrintMas(a)
End.
