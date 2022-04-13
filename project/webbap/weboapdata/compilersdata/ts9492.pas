type mas=array[1..100] of char;
var a:mas; i,n,s,p,l:byte;

procedure HeapSort(var Arr : mas; N : Integer);
var
  I,J,K,T,e   :   Integer;
  Tmp :   char;
begin
  i:=2;
  repeat
    t:=i;
    while t<>1 do
    begin
      k:=t div 2;
      if Arr[k-1]>=Arr[t-1] then
      begin
        t:=1;
        inc(s);
      end
      else
      begin
        inc(s);
        Tmp:=Arr[k-1];
        Arr[k-1]:=Arr[t-1];
        Arr[t-1]:=Tmp;
        inc(p);
        for l:=0 to n-1 do
          write(arr[l]:2);
        writeln;
        t:=k;
      end;
    end;