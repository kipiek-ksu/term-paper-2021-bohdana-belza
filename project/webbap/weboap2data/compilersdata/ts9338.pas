program mnojini;

const glasn=['a','e','i','o','u','y'];
      soglasn=['b','c','d','f','g','h','j','k','l',
      'm','n','p','q','r','s','t','v','w','x','z'];
var s:string;
    k,l:integer;
    g,i:integer;

begin
clrscr;
    
    read(s);

    k:=0;
    l:=0;
    for i:=1 to length(s) do
      if s[i] in glasn then
       inc(k)
      else
         if s[i] in soglasn then
          inc(l);
    write(k,' glasn i ',l,' soglasn');
   
end.