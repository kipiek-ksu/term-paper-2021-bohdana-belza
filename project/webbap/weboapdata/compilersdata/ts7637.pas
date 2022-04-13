program qs;
type mas=array [1..300] of char;
var
  m:mas;
  n,P,S:integer;
procedure inpmas(var a:mas;k:integer);
var i:integer;
begin
 for i:=1 to k do
  read(a[i]);
end;
procedure outmas(var a:mas;k:integer);
var i:integer;
begin
  for i:=1 to k-1 do
    write(a[i],' ');
  writeln(a[k]);
end;
procedure swap (var a:mas;i,j:integer);
var
  b:char;
begin
 b:=a[i];
 a[i]:=a[j];
 a[j]:=b;
end;

procedure Hoare(var a:mas;count,l,r:integer);
var
  left,right:integer;
  x:char;
begin
 if l<r then begin
    x:=a[(l+r) div 2];
    left:=l;
    right:=r;
    repeat
      while a[left] > x do
        begin
         left:=left+1;
         inc(S);
        end;
      while a[right]<x do
        begin
          right:=right-1;
          inc(S);
        end;
      if left<=right
        then begin
          swap(a,left,right);
          outmas(a,count);
          inc(P);
          left:=left+1;
          right:=right-1;
      end;
      until left>right;
      hoare(a,count,l,right);
      hoare(a,count,left,r);
 end;
end;
BEGIN
  P:=0;
  S:=0;
  readln(n);
  inpmas(m,n);
  hoare(m,n,1,n);
  writeln(S);
  writeln(P);
  outmas(m,n);
END.