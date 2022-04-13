program z40;
var a,b,c : string;
    i : longint;
  begin
    readln(a);
    b:='';
    for i:=1 to length(a) do b:=a[i]+b
    if a=b then write('true')
           else write('false');
    read;
  end.
