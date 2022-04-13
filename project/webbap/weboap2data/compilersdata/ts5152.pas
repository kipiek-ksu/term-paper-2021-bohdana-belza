Program PiramidSort;
Const m = 500;
Type Index = 1..m;
     Vector = array [Index] of char;
Var n: Index;
    a: Vector;
    s,p: integer;

 Procedure PrintMas (Var a: Vector);
 Var i: Index;
 Begin
  For i:=1 to n do write(,a[i]);
 End;

 Procedure swap (Var a: vector; i,j: Index);
 Var Temp: Char;
 Begin
  Temp:=a[i];
  a[i]:=a[j];
  a[j]:=Temp;
 end;


 Procedure rebuild (var a:Vector; first,last: Index);
 Var k: Index;
 begin

  While 2*first+1 <= last do begin
   inc(s);
   If a[2*first] > a[2*first+1]
     then k:=2*first
     else k:=2*first+1;
   If a[first] < a[k] then begin
    swap(a,first,k);
      printmas(A); WRITELN; inc(p);
    first:=k;
   end
   else break;
  end;

  If 2*first = last then
   If a[first] < a[last] then begin swap (a,first,last); end;
  inc(s);
 end;

 Procedure build  (var a:Vector; n: integer);
 Var i: Index;
 Begin
   For i:=n div 2 downto 1 do
   rebuild(a,i,n)
 end;

 Procedure TreeSort (Var a: Vector; n:Integer);
 Var j: index;
 Begin
  build(a,n);
  For j:=n downto 2 do begin
   swap(a,1,j);
     printmas(A); WRITELN; inc(p);
   rebuild(a,1,j-1);
  end;
 end;

 Procedure InputMas (Var a: Vector; Var n: Index);
 Var i: Index;
 Begin
  Readln(n);
  For i:=1 to n do read(a[i]);
 End;

Begin
 p:=0; s:=0;
 InputMas(a,n);
 TreeSort(a,n);
 writeln(s);
 writeln(p);

 PrintMas(a);
End.
