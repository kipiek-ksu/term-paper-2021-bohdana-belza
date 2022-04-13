program HoareSort;
const n=40;
type index = 1..n;
     MY = array [index] of integer;
 var Arr1: MY;
     k,s,p: integer;
procedure ArrInp(var A: MY; k: integer);
 var i: integer;
 begin
  for i:=1 to k do read(A[i]);
 end;
procedure ArrOut(A: MY; k: integer);
 var i: integer;
 begin
  for i:=1 to k do write(A[i],' ');
 end;
procedure swap(i,j: integer);
  var b: integer;
  begin
   b:=Arr1[i];
   Arr1[i]:=Arr1[j];
   Arr1[j]:=b;
   p:=p+1;
  end;
 procedure Hoare(L,R: integer);
  var left,right,x: Integer;
  begin
    if L<R then
     begin
      x:=Arr1[(L+R) div 2];
      left:=L; right:=R;
      repeat
       while Arr1[left]<x do left:=Succ(left);
       While Arr1[right]>x do right:=Pred(right);
       if left<=right then
        begin
         Swap(left,right);
         ArrOut(Arr1,k);
         WriteLn(' ');
         left:=Succ(left); right:=Pred(right);
         s:=s+1;
        end;
        s:=s+1;
      until left>right;
      Hoare(L,right);
      Hoare(left,R);
   end;
  end;
BEGIN
 ReadLn(k);
 ArrInp(Arr1,k);
 Hoare(1,k);
 writeln(s);
 writeLn(p);
 ArrOut(Arr1,k);
END.