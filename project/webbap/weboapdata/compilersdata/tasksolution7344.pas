Program L3z36;
const
     z = 200;
type
    MyArray = array[1..z] of real;
Var n,m:integer;
    A:MyArray;
    B:MyArray;
    iMin:integer;
    i:integer;
Function FMin(var x:MyArray; k:integer):integer;
var
    i:integer;
    iMin:integer;
begin
     iMin:=1;
     for i:= 2 to k do
         if x[iMin] > x[i] then
            iMin:=i;
     FMin := iMin
end;

Procedure Inp(var x:MyArray; k:integer);
var
   i:integer;
begin
     for i:=1 to k do
         read(x[i])
end;

Procedure Out(var x:MyArray; k:integer);
var
   i:integer;
begin
      write(x[1]:2:2);
      for i:=2 to k do
          write(' ',x[i]:2:2)
end;

Procedure Main(var x:MyArray; k:integer);
var
   i:integer;
   iMin:integer;
begin
     iMin:=FMin(x,k);
     for i:=iMin + 1 to k do
         x[i]:=21.05
end;

begin
     read(n,m);
     Inp(A,n);
     Inp(B,m);

     Main(A,n);
     Main(B,m);

     Out(A,n);
     writeln;
     Out(B,m)
end.